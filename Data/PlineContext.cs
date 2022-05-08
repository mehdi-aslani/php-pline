using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;
using Pline.Models.Users;

namespace Pline.Data;

public sealed class PlineContext : IdentityDbContext<TblUser>
{
    public PlineContext(DbContextOptions<PlineContext> options, IWebHostEnvironment _config)
        : base(options)
    {
        if (!_config.IsDevelopment())
            Database.EnsureCreated();
    }

    public DbSet<Pline.Models.TblSipProfileParameter> TblSipProfileParameter { get; set; }
}

