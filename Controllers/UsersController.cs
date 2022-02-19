#nullable disable
using System.Security.Claims;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using pline.Data;
using pline.Models;
using PlineFaxServer.Tools;
using AspNetCoreHero.ToastNotification.Abstractions;

namespace pline.Controllers;

[Authorize]
public class UsersController : Controller
{
    private readonly PlineDbContext _context;
    private readonly SignInManager<TblUser> _signInManager;
    private readonly UserManager<TblUser> _userManager;
    private readonly INotyfService _notifyService;

    public UsersController(PlineDbContext context, UserManager<TblUser> userManager,
            SignInManager<TblUser> signInManager, INotyfService notifyService)
    {
        _context = context;
        _userManager = userManager;
        _signInManager = signInManager;
        _notifyService = notifyService;
    }

    // GET: Users
    public async Task<IActionResult> Index()
    {
        return View(await _context.Users.ToListAsync());
    }

    // GET: Users/Details/5
    public async Task<IActionResult> Details(string id)
    {
        if (id == null)
        {
            return NotFound();
        }

        var tblUser = await _context.Users
            .FirstOrDefaultAsync(m => m.Id == id);
        if (tblUser == null)
        {
            return NotFound();
        }

        return View(tblUser);
    }

    // GET: Users/Create
    public IActionResult Create()
    {
        return View();
    }

    // POST: Users/Create
    // To protect from overposting attacks, enable the specific properties you want to bind to.
    // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create([Bind("FirstName,LastName,Enable,Role,Description,Id,UserName,NormalizedUserName,Email,NormalizedEmail,EmailConfirmed,PasswordHash,SecurityStamp,ConcurrencyStamp,PhoneNumber,PhoneNumberConfirmed,TwoFactorEnabled,LockoutEnd,LockoutEnabled,AccessFailedCount")] TblUser tblUser)
    {
        if (ModelState.IsValid)
        {
            _context.Add(tblUser);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }
        return View(tblUser);
    }

    // GET: Users/Edit/5
    public async Task<IActionResult> Edit(string id)
    {
        if (id == null)
        {
            return NotFound();
        }

        var tblUser = await _context.Users.FindAsync(id);
        if (tblUser == null)
        {
            return NotFound();
        }
        return View(tblUser);
    }

    // POST: Users/Edit/5
    // To protect from overposting attacks, enable the specific properties you want to bind to.
    // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(string id, [Bind("FirstName,LastName,Enable,Role,Description,Id,UserName,NormalizedUserName,Email,NormalizedEmail,EmailConfirmed,PasswordHash,SecurityStamp,ConcurrencyStamp,PhoneNumber,PhoneNumberConfirmed,TwoFactorEnabled,LockoutEnd,LockoutEnabled,AccessFailedCount")] TblUser tblUser)
    {
        if (id != tblUser.Id)
        {
            return NotFound();
        }

        if (ModelState.IsValid)
        {
            try
            {
                _context.Update(tblUser);
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!TblUserExists(tblUser.Id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }
            return RedirectToAction(nameof(Index));
        }
        return View(tblUser);
    }

    // GET: Users/Delete/5
    public async Task<IActionResult> Delete(string id)
    {
        if (id == null)
        {
            return NotFound();
        }

        var tblUser = await _context.Users
            .FirstOrDefaultAsync(m => m.Id == id);
        if (tblUser == null)
        {
            return NotFound();
        }

        return View(tblUser);
    }

    // POST: Users/Delete/5
    [HttpPost, ActionName("Delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> DeleteConfirmed(string id)
    {
        var tblUser = await _context.Users.FindAsync(id);
        _context.Users.Remove(tblUser);
        await _context.SaveChangesAsync();
        return RedirectToAction(nameof(Index));
    }

    private bool TblUserExists(string id)
    {
        return _context.Users.Any(e => e.Id == id);
    }

    [AllowAnonymous]
    [HttpPost, HttpGet]
    public async Task<IActionResult> Login(LoginPage login)
    {
        //await _signInManager.SignOutAsync();
        if (login.Username == null || login.Password == null)
        {
            ModelState.Clear();
            return View(login);
        }

        var admin = _userManager.FindByNameAsync("admin");
        if (admin.Result == null)
        {
            TblUser tblUser = new TblUser()
            {
                FirstName = "Administrator",
                LastName = "",
                UserName = "admin",
                Email = "admin@localhost.local",
                Enable = true,

            };
            var resultUser = await _userManager.CreateAsync(tblUser, "Admin@123");
            if (resultUser != IdentityResult.Success)
            {
                ModelState.AddModelError("", "Runtime Error");
            }
            await _userManager.AddClaimAsync(tblUser, new Claim(ClaimTypes.Role, "Admin"));
        }

        if (ModelState.IsValid)
        {
            var result =
                await _signInManager.PasswordSignInAsync(login.Username, login.Password, login.RememberMe, true);
            if (result.IsLockedOut)
            {
                ModelState.AddModelError("Username", "The user is temporarily disabled");
            }
            else if (result.Succeeded)
            {
                var user = await _userManager.FindByNameAsync(login.Username);
                if (user.Enable)
                {
                    _notifyService.Success("Login successfully. Welcome to P-Line VoIP Server");
                    return RedirectToAction("Index", "Home");
                }
                else
                {
                    ModelState.AddModelError("", "Your account has been disabled. Please contact the system administrator");
                }
            }
            else
            {
                ModelState.AddModelError("", "Username or password is incorrect");
            }
        }

        login.RememberMe = true;
        return View(login);
    }

    public IActionResult Logout()
    {
        _signInManager.SignOutAsync();
        return RedirectToAction("Login");
    }

}

