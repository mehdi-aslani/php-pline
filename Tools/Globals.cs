using System;

namespace PlineFaxServer.Tools;

public static class Globals
{
    public static string ToastWarning = "___Warning";
    public static string ToastError = "___Error";
    public static string ToastInfo = "___Info";
    public static string ToastSuccess = "___Success";

    public static string GenerateId()
    {
        return Guid.NewGuid().ToString("N");
    }

}
