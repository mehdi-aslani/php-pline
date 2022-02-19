#nullable disable
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using pline.Data;
using pline.Models;

namespace pline.Controllers
{
    public class DomainController : Controller
    {
        private readonly PlineDbContext _context;

        public DomainController(PlineDbContext context)
        {
            _context = context;
        }

        public IActionResult Index()
        {
            // return View(await _context.TblDomains.ToListAsync());
            if (HttpContext.Request.Headers["X-Requested-With"] == "XMLHttpRequest")
                return PartialView("_IndexGrid", _context.Set<TblDomain>());
            return View();
        }

        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var tblDomain = await _context.TblDomains
                .FirstOrDefaultAsync(m => m.Id == id);
            if (tblDomain == null)
            {
                return NotFound();
            }

            return View(tblDomain);
        }

        public IActionResult Create()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("Id,Domain,Description")] TblDomain tblDomain)
        {
            if (ModelState.IsValid)
            {
                int domainCnt = await _context.TblDomains.Where(t => t.Domain == tblDomain.Domain).CountAsync();
                if (domainCnt > 0)
                {
                    ModelState.AddModelError("Domain", "Domain with this name already exists");
                    return View(tblDomain);
                }
                _context.Add(tblDomain);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return View(tblDomain);
        }

        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var tblDomain = await _context.TblDomains.FindAsync(id);
            if (tblDomain == null)
            {
                return NotFound();
            }
            return View(tblDomain);
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int? id, [Bind("Id,Domain,Description")] TblDomain tblDomain)
        {
            if (id != tblDomain.Id)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(tblDomain);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!TblDomainExists(tblDomain.Id))
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
            return View(tblDomain);
        }

        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int? id)
        {

            var tblDomain = await _context.TblDomains.FindAsync(id);
            if (tblDomain.Id == 1)
            {
                return Json(new { hasError = true, error = "You can't delete default domain." });
            }
            _context.TblDomains.Remove(tblDomain);
            int result = await _context.SaveChangesAsync();
            return Json(new { hasError = result > 0, error = "No items were removed!" });
        }

        private bool TblDomainExists(int? id)
        {
            return _context.TblDomains.Any(e => e.Id == id);
        }
    }
}
