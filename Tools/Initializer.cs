

using System.Security.Claims;
using Microsoft.AspNetCore.Identity;
using pline.Data;
using pline.Models;

namespace pline.Tools;

public class Initializer
{
    private readonly UserManager<TblUser> _userManager;
    private readonly PlineDbContext _context;

    public Initializer(UserManager<TblUser> userManager, PlineDbContext context)
    {
        _userManager = userManager;
        _context = context;
    }

    public void Initialize()
    {
        if (_context.TblDomains.LongCount() == 0)
        {

            TblDomain domain = new TblDomain()
            {
                Domain = "$${domain}",
                Description = "Default Domain"
            };
            _context.Add(domain);
            _context.SaveChanges();
        }

    }
}