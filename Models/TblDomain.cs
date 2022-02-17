using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace pline.Models;

[Table("TblDomain")]
public class TblDomain
{
    public int? Id { get; set; }

    [Required]
    [MaxLength(255)]
    public string Domain { get; set; } = "domain";

    [MaxLength(1024)]
    public string Description { get; set; } = "";

    public TblDomain()
    {
        this.Domain = "$${doamin}";
        this.Description = "";
        this.Id = null;
    }

}