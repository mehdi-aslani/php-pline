
using System.ComponentModel.DataAnnotations;

namespace Pline.Models.Users
{
    public class RegisterModel
    {

        [Display(Name = "User Name")]
        [MaxLength(128)]
        public string Username { get; set; }

        [Display(Name = "Password")]
        [MaxLength(128)]
        public string Password { get; set; }


        [Display(Name = "First Name")]
        [MaxLength(128)]
        public string FirstName { get; set; }

        [Display(Name = "Last Name")]
        [MaxLength(128)]
        public string LastName { get; set; }

        [Display(Name = "Status")]
        public bool Enable { get; set; }

        [MaxLength(256)]
        [Display(Name = "Description")]
        public string Description { get; set; }

    }
}