using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.AspNetCore.Identity;

namespace Pline.Models.Users;
public class TblUser : IdentityUser
{
    [Display(Name = "First Name")]
    [MaxLength(128)]
    public string FirstName { get; set; } = "";

    [Display(Name = "Last Name")]
    [MaxLength(128)]
    public string LastName { get; set; } = "";

    [Display(Name = "Status")]
    public bool Enable { get; set; } = true;

    [Display(Name = "Role")]
    public string Role { get; set; } = "Client";

    [MaxLength(256)]
    [Display(Name = "Description")]
    public string Description { get; set; } = "";

}
