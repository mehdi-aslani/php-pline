using System.ComponentModel.DataAnnotations;

namespace pline.Models
{
    public class LoginPage
    {
        [Display(Name = "Username")]
        [Required]
        public string? Username { get; set; } = null;

        [Display(Name = "Password")]
        [Required, DataType(DataType.Password)]
        public string? Password { get; set; } = null;

        [Display(Name = "Remember Me")]
        public bool RememberMe { get; set; } = true;

        public string ReturnUrl { get; set; } = "";
    }
}