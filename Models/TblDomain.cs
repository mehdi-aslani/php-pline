using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.EntityFrameworkCore;

namespace pline.Models;

[Table("TblDomains")]
public class TblDomain
{
    [Key]
    public int? Id { get; set; }

    [Required]
    [MaxLength(255)]
    public string? Domain { get; set; }

    [MaxLength(1024)]
    public string? Description { get; set; }


    public static void OnModelCreating(ModelBuilder builder)
    {
        builder.Entity<TblDomain>().HasIndex(t => t.Domain).IsUnique(true);
    }

}

