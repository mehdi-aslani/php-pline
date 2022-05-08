using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace Pline.Models;

[Table("tblSipProfileParameters")]
public class TblSipProfileParameter
{
    [Key]
    public long Id { get; set; }

    [Required]
    public string Group { get; set; }

    [Required]
    public string Key { get; set; }

    [Required]
    public string Value { get; set; }

    [Required]
    public string DefaultValue { get; set; }

    [Required]
    public string Options { get; set; }
}
