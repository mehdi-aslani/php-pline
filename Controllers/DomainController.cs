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


        // GET: Domain
        public IActionResult Index()
        {
            // return View(await _context.TblDomains.ToListAsync());
            //return View(_context.Set<TblDomain>());
            if (HttpContext.Request.Headers["X-Requested-With"] == "XMLHttpRequest")
                return PartialView("_IndexGrid", _context.Set<TblDomain>());
            return View();
        }

        // GET: Domain/Details/5
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

        // GET: Domain/Create
        public IActionResult Create()
        {
            return View();
        }

        // POST: Domain/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("Id,Domain,Description")] TblDomain tblDomain)
        {
            if (ModelState.IsValid)
            {
                _context.Add(tblDomain);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return View(tblDomain);
        }

        // GET: Domain/Edit/5
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

        // POST: Domain/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
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

        // GET: Domain/Delete/5
        public async Task<IActionResult> Delete(int? id)
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

        // POST: Domain/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int? id)
        {
            var tblDomain = await _context.TblDomains.FindAsync(id);
            _context.TblDomains.Remove(tblDomain);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool TblDomainExists(int? id)
        {
            return _context.TblDomains.Any(e => e.Id == id);
        }
    }
}
