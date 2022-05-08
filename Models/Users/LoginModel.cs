

using System.ComponentModel.DataAnnotations;

namespace Pline.Models.Users;
public class LoginModel
{
    [Required(ErrorMessage = "User Name is required")]
    public string Username { get; set; }

    [Required(ErrorMessage = "Password is required")]
    public string Password { get; set; }

    [Required(ErrorMessage = "Remember Me is required")]
    public bool RememberMe { get; set; }
}