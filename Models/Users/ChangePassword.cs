#nullable disable
using System.ComponentModel.DataAnnotations;

namespace pline.Models.Users
{
    public class ChangePassword
    {
        [DataType(DataType.Password)]
        [Required]
        [Display(Name = "Current password")]
        [MaxLength(256)]
        public string OldPassword { get; set; }

        [DataType(DataType.Password)]
        [Required]
        [Display(Name = "New password")]
        [MaxLength(256)]
        public string Password { get; set; }

        [DataType(DataType.Password)]
        [Required]
        [Display(Name = "Repeat the new password")]
        [MaxLength(256)]
        public string RepPassword { get; set; }
    }
}