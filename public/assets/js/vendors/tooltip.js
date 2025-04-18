"use strict";
$(".imgtooltip").length &&
    tippy(".imgtooltip", {
        content(t) {
            t = t.getAttribute("data-template");
            return document.getElementById(t).innerHTML;
        },
        allowHTML: !0,
        animation: "scale",
        theme: "light",
    }),
    $(".bookmark").length &&
        tippy(".bookmark", { content: "Add to Bookmarks", animation: "scale" }),
    $(".removeBookmark").length &&
        tippy(".removeBookmark", {
            content: "Remove Bookmarks",
            animation: "scale",
        }),
    $(".texttooltip").length &&
        tippy(".texttooltip", {
            content(t) {
                t = t.getAttribute("data-template");
                return document.getElementById(t).innerHTML;
            },
            allowHTML: !0,
            animation: "scale",
            theme: "light",
        }),
    $(".dropdownTooltip").length &&
        tippy(".dropdownTooltip", {
            content(t) {
                t = t.getAttribute("data-template");
                return document.getElementById(t).innerHTML;
            },
            allowHTML: !0,
            animation: "scale",
            placement: "right",
            theme: "lightPurple",
        });
