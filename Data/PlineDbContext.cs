using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;
using pline.Models;

namespace pline.Data;

public class PlineDbContext : IdentityDbContext<TblUser>
{
    public PlineDbContext(DbContextOptions<PlineDbContext> options)
         : base(options)
    {
        // Database.EnsureCreated();
    }

    protected override void OnModelCreating(ModelBuilder builder)
    {
        TblDomain.OnModelCreating(builder);
        base.OnModelCreating(builder);
    }

    public DbSet<TblDomain> TblDomains { get; set; }
}
