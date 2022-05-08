

namespace Pline.Tools;

public class Response
{
    public enum ResponseStatus
    {
        Error = 0,
        Success = 1,
        Warning = 2,
        Info = 3,
        Danger = 4,
    }

    public ResponseStatus Status { get; set; }
    public List<string> Messages { get; set; }
}