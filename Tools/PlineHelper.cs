using System;

namespace pline.Tools
{
    public static class PlineHelper
    {
        public static string ActiveLinkAjax(string href, string text, bool downloadLink, bool openNewTab)
        {
            return
                $"<a {(openNewTab ? "target=\"_blank\"" : "")} href=\"{href}\" {(downloadLink ? "download" : "")}>{text}</a>";
        }

        public static string ActiveLinkAjax(string href, string text, string css, string title = "")
        {
            return $"<a href=\"{href}\" class=\"{css}\" title=\"{title}\">{text}</a>";
        }
    }
}