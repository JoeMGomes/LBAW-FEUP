let textAreas = document.getElementsByClassName("MDE");
console.log(textAreas[0]);

 //easyMDE = new EasyMDE({element: document.getElementById('my-text-area')});
 for (let i = 0; i < textAreas.length; i++){
     new EasyMDE({element: textAreas[i], minHeight: "70px",});
 }


let newQuestionText = document.querySelector(".QuestionMDE");
if (newQuestionText != null){
    new EasyMDE({element: newQuestionText, minHeight: "200px",});
}


const MONTH_NAMES = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

function getFormattedDate(date, prefomattedDate = false, hideYear = false) {
    const day = date.getDate();
    const month = MONTH_NAMES[date.getMonth()];
    const year = date.getFullYear();
    const hours = date.getHours();
    let minutes = date.getMinutes();

    if (minutes < 10) {
        // Adding leading zero to minutes
        minutes = `0${minutes}`;
    }

    if (prefomattedDate) {
        // Today at 10:20
        // Yesterday at 10:20
        return `${prefomattedDate} at ${hours}:${minutes}`;
    }

    if (hideYear) {
        // 10. January at 10:20
        return `${day}. ${month} at ${hours}:${minutes}`;
    }

    // 10. January 2017. at 10:20
    return `${day}. ${month} ${year}. at ${hours}:${minutes}`;
}

// --- Main function
function timeAgo(dateParam) {
    if (!dateParam) {
        return null;
    }

    const date = typeof dateParam === "object" ? dateParam : new Date(dateParam);
    const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
    const today = new Date();
    const yesterday = new Date(today - DAY_IN_MS);
    const seconds = Math.round((today - date) / 1000);
    const minutes = Math.round(seconds / 60);
    const isToday = today.toDateString() === date.toDateString();
    const isYesterday = yesterday.toDateString() === date.toDateString();
    const isThisYear = today.getFullYear() === date.getFullYear();

    if (seconds < 5) {
        return "now";
    } else if (seconds < 60) {
        return `${seconds} seconds ago`;
    } else if (seconds < 90) {
        return "about a minute ago";
    } else if (minutes < 60) {
        return `${minutes} minutes ago`;
    } else if (isToday) {
        return getFormattedDate(date, "Today"); // Today at 10:20
    } else if (isYesterday) {
        return getFormattedDate(date, "Yesterday"); // Yesterday at 10:20
    } else if (isThisYear) {
        return getFormattedDate(date, false, true); // 10. January at 10:20
    }

    return getFormattedDate(date); // 10. January 2017. at 10:20
}

function scroll_to(clicked_link, nav_height) {
    let element_class = clicked_link.attr("href").replace("#", ".");
    let scroll_to = 0;
    if (element_class != ".top-content") {
        element_class += "-container";
        scroll_to = $(element_class).offset().top - nav_height;
    }
    if ($(window).scrollTop() != scroll_to) {
        $("html, body").stop().animate(
            {
                scrollTop: scroll_to,
            },
            1000
        );
    }
}

function open_notifications() {
    let notifications = document.getElementById("notifications");
    notifications.style.display = "block";
    let notificationsmob = document.getElementById("notifications-mobile");
    if (notificationsmob != null) {
        notificationsmob.style.display = "block";
    }
}

function close_notifications() {
    let notifications = document.getElementById("notifications");
    notifications.style.display = "none";
    let notificationsmob = document.getElementById("notifications-mobile");
    if (notificationsmob != null) {
        notificationsmob.style.display = "none";
    }
}

document.addEventListener("click", function (event) {
    if (event.target.closest(".notifications")) return;
    if (event.target.closest(".notifications-buttom")) return;
    close_notifications();
});

function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data)
        .map(function (k) {
            return encodeURIComponent(k) + "=" + encodeURIComponent(data[k]);
        })
        .join("&");
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();

    request.open(method, url, true);
    request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", handler);
    request.send(encodeForAjax(data));
}

function Handler() {
    let response = JSON.parse(this.responseText);
    let tagElem = document.querySelector("#tags");
    tagElem.innerHTML = "";
    for (let i = 0; i < response.length; i++) {
        tagElem.innerHTML +=
            '<option value="' + response[i].name + '" data-color="' + response[i].color +'" data-catid="' + response[i].id + '">';
    }
}
function NotificationHandler() {
    let response = JSON.parse(this.responseText);
    console.log(response);
    let tagElem = document.querySelector("#singleNotification");
    tagElem.innerHTML = "";
    for (let i = 0; i < response.length; i++) {
        if (response[i].type == "VOTE") {
            tagElem.innerHTML += '<div class=" d-flex justify-content-start notifications mb-3 px-2">';
            if (!response[i].read) {
                tagElem.innerHTML += '<i class="fa fa-circle pt-3 pr-2" style="color: #7a86ef"></i>';
            }
            tagElem.innerHTML +=
                '<span> 1 user upvoted your post: "<strong>' +
                response[i].text +
                '</strong>"' +
                '<div class="text-left pl-4">' +
                timeAgo(response[i].date.split(".")[0]) +
                "</div>" +
                "</span>" +
                "</div>";
        } else if (response[i].type == "POST") {
            tagElem.innerHTML += '<div class=" d-flex justify-content-start notifications mb-3 px-2">';
            if (!response[i].read) {
                tagElem.innerHTML += '<i class="fa fa-circle pt-3 pr-2" style="color: #7a86ef"></i>';
            }
            tagElem.innerHTML +=
                '<span class> 1 user replied your post: "<strong>' +
                response[i].text +
                '</strong>"' +
                '<div class="text-left pl-4">' +
                timeAgo(response[i].date.split(".")[0]) +
                "</div>" +
                "</span>" +
                "</div>";
        } else {
            tagElem.innerHTML += '<div class=" d-flex justify-content-start notifications mb-3 px-2">';
            if (!response[i].read) {
                tagElem.innerHTML += '<i class="fa fa-circle pt-3 pr-2" style="color: #7a86ef"></i>';
            }
            tagElem.innerHTML +=
                "<span> One of your Post got deleted because of too many reports!" +
                '<div class="text-left pl-4">' +
                timeAgo(response[i].date.split(".")[0]) +
                "</div>" +
                "</span>" +
                "</div>";
        }
    }
}

function getNotifications() {
    sendAjaxRequest("post", "/api/member/notifications", null, NotificationHandler);
}

function getCategNumber() {
    for (let i = 1; i <= 5; i++) {
        if (document.getElementById("category" + i) == null) {
            return i;
        }
    }
    return 0;
}

function deletecategory(value) {
    let el = document.getElementById("category" + value);
    el.nextElementSibling.remove();
    el.remove();
}

jQuery(document).ready(function () {
    /*
	    Sidebar
	*/
    $(".dismiss, .overlay").on("click", function () {
        $(".sidebar").removeClass("active");
        $(".sidebar").addClass("inactive");
        $(".overlay").removeClass("active");
    });

    $(".open-menu").on("click", function (e) {
        e.preventDefault();
        $(".sidebar").addClass("active");
        $(".sidebar").removeClass("inactive");
        $(".overlay").addClass("active");
        // close opened sub-menus
        $(".collapse.show").toggleClass("show");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

    /* replace the default browser scrollbar in the sidebar, in case the sidebar menu has a height that is bigger than the viewport */
    $("overflow-auto").mCustomScrollbar({
        theme: "minimal-dark",
    });

    $(".labelToCheck").on("keypress", function (event) {
        if (event.which === 13) {
            $(this).prop("checked", !$(this).prop("checked"));
        }
    });

    $(window).resize(function () {
        if ($(window).width() >= 992) {
            $(".sidebar").addClass("active");
            $(".sidebar").removeClass("inactive");
        } else {
            $(".sidebar").removeClass("active");
            $(".sidebar").addClass("inactive");
        }
    });

    /*
	    Navigation
	*/

    $(".to-top a").on("click", function (e) {
        e.preventDefault();
        if ($(window).scrollTop() != 0) {
            $("html, body").stop().animate(
                {
                    scrollTop: 0,
                },
                1000
            );
        }
    });
});

let categ = document.querySelector("#category");
if (categ != null) {
    categ.addEventListener("click", function (e) {
        let val = categ.value;
        if (val.trim() != "") {
            let opts = document.getElementById("tags").childNodes;
            for (let i = 0; i < opts.length; i++) {
                if (opts[i].value !== undefined) {
                    if (opts[i].value === val) {
                        let categNumb = getCategNumber();
                        console.log(categNumb);
                        if (categNumb != 0) {
                            document.querySelector("#categoryList").innerHTML +=
                                '<input class="form-control" id="category' +
                                categNumb +
                                '" name="category' +
                                categNumb +
                                '" value="' +
                                val +
                                '" readonly required><button onclick="deletecategory(' +
                                categNumb +
                                ')"> X </button>';
                        }
                    }
                }
            }
        }
        let data = $("#category").val();
        sendAjaxRequest("post", "/api/category", { message: data }, Handler);
        e.preventDefault();
        return false;
    });
    categ.addEventListener("input", function (e) {
        let val = categ.value;
        if (val.trim() != "") {
            let opts = document.getElementById("tags").childNodes;
            for (let i = 0; i < opts.length; i++) {
                if (opts[i].value !== undefined) {
                    if (opts[i].value === val) {
                        let categNumb = getCategNumber();
                        if (categNumb != 0) {
                            document.querySelector("#categoryList").innerHTML +=
                                '<input class="form-control" id="category' +
                                categNumb +
                                '" name="category' +
                                categNumb +
                                '" value="' +
                                val +
                                '" readonly required><button onclick="deletecategory(' +
                                categNumb +
                                ')"> X </button>';
                            categ.value = "";
                        }
                    }
                }
            }
        }
        let data = $("#category").val();
        sendAjaxRequest("post", "/api/category", { message: data }, Handler);
        e.preventDefault();
        return false;
    });
}

function downvote(id) {
    sendAjaxRequest("post", "/api/downvote", { message: id }, voteHandler);
}

function upvote(id) {
    sendAjaxRequest("post", "/api/upvote", { message: id }, voteHandler);
}

function voteHandler(id) {
    let response = JSON.parse(this.responseText);
    console.log(response);
    let tagElem = document.querySelector("#votes_answer" + response.id);
    tagElem.innerHTML = response.votes;
}

function chooseBestAnswer(answer, question) {
    sendAjaxRequest("post", "/api/bestAnswer", { answer: answer, question: question }, function () {
        location.reload();
    });
}

//Dissapear Message Function
function hideMessage(object) {
    if (object == null) {
        console.log("null");
        object = document.getElementById("message");
    } else {
        console.log("not null");
    }
    object.parentNode.removeChild(object);
}

/**
 * Tag Creation color and text preview
 */
let newCatPreview = document.getElementById("newCatPreview");
let color_picker = document.getElementById("color-picker");
let color_picker_wrapper = document.getElementById("color-picker-wrapper");
let cat_input = document.getElementById("inputCat");

color_picker.onchange = function () {
    color_picker_wrapper.style.background = color_picker.value;
    newCatPreview.style.background = color_picker.value;
};
cat_input.addEventListener("keyup", function () {
    newCatPreview.innerHTML = cat_input.value;
});

newCatPreview.innerHTML = "&nbsp";
color_picker_wrapper.style.background = color_picker.value;
newCatPreview.style.background = color_picker.value;

/**
 * Tag Edition and text preview
 */
let newCatPreviewEdit = document.getElementById("newCatPreviewEdit");
let color_pickerEdit = document.getElementById("color-pickerEdit");
let color_picker_wrapperEdit = document.getElementById("color-picker-wrapperEdit");
let cat_inputEdit = document.getElementById("inputCatEdit");

color_pickerEdit.onchange = function () {
    color_picker_wrapperEdit.style.background = color_pickerEdit.value;
    newCatPreviewEdit.style.background = color_pickerEdit.value;
};
cat_inputEdit.addEventListener("keyup", function () {
    newCatPreviewEdit.innerHTML = cat_inputEdit.value;
});

newCatPreviewEdit.innerHTML = "&nbsp";
color_picker_wrapperEdit.style.background = color_pickerEdit.value;
newCatPreviewEdit.style.background = color_pickerEdit.value;

//Edit Categories

let categEdit = document.querySelector("#categoryEdit");

categEdit.addEventListener("input", function (e) {
    let val = categEdit.value;
    if (val.trim() != "") {
        let opts = document.getElementById("tags").childNodes;
        for (let i = 0; i < opts.length; i++) {
            if (opts[i].value !== undefined) {
                if (opts[i].value === val) {
                    let newName = document.getElementById("inputCatEdit");
                    newName.value = val;
                    let newColor = document.getElementById("color-pickerEdit");
                    let newColorWrapper = document.getElementById("color-picker-wrapperEdit");
                    let newCatPreviewEdit = document.getElementById("newCatPreviewEdit");
                    let catID = document.getElementById("catId");
                    catID.value = opts[i].getAttribute("data-catid")
                    let color = decimalToHexString(parseInt(opts[i].getAttribute("data-color")));
                    newColor.value = "#" + color;
                    newColorWrapper.style.background = "#" + color;
                    newCatPreviewEdit.style.background = "#" + color;
                    newCatPreviewEdit.innerHTML = val;
                }
            }
        }
    }
    let data = $("#categoryEdit").val();
    sendAjaxRequest("post", "/api/category", { message: data }, Handler);
    e.preventDefault();
    return false;
});

function decimalToHexString(number) {
    if (number < 0) {
        number = 0xffffffff + number + 1;
    }

    return number.toString(16).toUpperCase();
}

