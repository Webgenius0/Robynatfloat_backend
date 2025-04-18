var isFirst,
    isLast,
    contactList = new List("list-of-records", {
        valueNames: [
            "id",
            "owner",
            "category",
            "rating",
            "company_name",
            "location",
            { attr: "src", name: "logo_img" },
            "location",
            "email_id",
        ],
        page: 8,
        pagination: !0,
    }),
    count = 0,
    domainroot = "https://dashui.codescandy.com/dashuipro";
const url = new Request(domainroot + "/assets/json/company-list.json");
fetch(url)
    .then((e) => e.json())
    .then((e) => {
        for (var t = JSON.parse(JSON.stringify(e)), n = 0; n < t.length; ++n)
            contactList.add({
                id: t[n].id,
                owner: t[n].owner,
                category: t[n].category,
                rating: t[n].rating,
                company_name: t[n].company_name,
                location: t[n].location,
                logo_img: t[n].logo_img,
                location: t[n].location,
                email_id: t[n].email_id,
                about_company: t[n].about_company,
            });
    })
    .catch(console.error);
var idField = document.getElementById("id-field"),
    companyLogo = document.getElementById("company-logo"),
    companyOwnerField = document.getElementById("company-owner-field"),
    categoryField = document.getElementById("category-field"),
    locationField = document.getElementById("location-field"),
    companyNameField = document.getElementById("company-name-field"),
    ratingField = document.getElementById("rating-field"),
    emailField = document.getElementById("email-field"),
    aboutCompanyField = document.getElementById("about-company-field"),
    contactModal = new bootstrap.Modal(
        document.getElementById("add-edit-modal"),
        { keyboard: !1 }
    ),
    contactModalButton = document.getElementById("add-edit-modal-button"),
    addButton = document.getElementById("add-btn"),
    updateButton = document.getElementById("update-btn"),
    addEditModal = document.getElementById("add-edit-modal"),
    nextButton = document.querySelector(".pagination-next"),
    previousButton = document.querySelector(".pagination-prev"),
    action = null;
document.body.contains(contactModalButton) &&
    contactModalButton.addEventListener("click", function () {
        clearFields();
    }),
    document.body.contains(addEditModal) &&
        (addEditModal.addEventListener("show.bs.modal", function (e) {
            (count = contactList.items.length + 1),
                "edit" === action
                    ? ((document.getElementById(
                          "add-edit-modal-label"
                      ).innerHTML = "Edit Company"),
                      (updateButton.style.display = "block"),
                      (addButton.style.display = "none"))
                    : ((document.getElementById(
                          "add-edit-modal-label"
                      ).innerHTML = "Add New Company"),
                      (idField.value = count),
                      (updateButton.style.display = "none"),
                      (addButton.style.display = "block")),
                (action = null);
        }),
        addEditModal.addEventListener("hidden.bs.modal", function (e) {
            e.preventDefault(), clearFields();
        })),
    document.body.contains(addButton) &&
        addButton.addEventListener("click", function (e) {
            "" !== companyOwnerField.value &&
                "" !== categoryField.value &&
                "" !== ratingField.value &&
                "" !== companyNameField.value &&
                "" !== locationField.value &&
                "" !== emailField.value &&
                (contactList.add({
                    id: count,
                    logo_img: companyLogo.src,
                    owner: companyOwnerField.value,
                    category: categoryField.value,
                    rating: ratingField.value,
                    company_name: companyNameField.value,
                    location: locationField.value,
                    email_id: emailField.value,
                    about_company: aboutCompanyField.value,
                }),
                document.getElementById("btn-close-modal").click(),
                clearFields(),
                count++);
        }),
    document.body.contains(updateButton) &&
        updateButton.addEventListener("click", function (e) {
            e.preventDefault(),
                contactList
                    .get("id", idField.value)[0]
                    .values({
                        id: idField.value,
                        logo_img: companyLogo.src,
                        owner: companyOwnerField.value,
                        category: categoryField.value,
                        rating: ratingField.value,
                        company_name: companyNameField.value,
                        location: locationField.value,
                        email_id: emailField.value,
                        about_company: aboutCompanyField.value,
                    }),
                document.getElementById("btn-close-modal").click(),
                clearFields();
        }),
    contactList.on("updated", function (t) {
        (viewButtons = document.getElementsByClassName("view-item-btn")),
            Array.from(viewButtons).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (rowId = e.target.closest("tr").children[1].innerText),
                        t.get({ id: rowId }).forEach(function (e) {
                            (currentRow = JSON.parse(JSON.stringify(e._values)))
                                .id == rowId &&
                                (console.log(typeof currentRow.rating),
                                (document.getElementById(
                                    "view-detail-owner"
                                ).innerHTML = currentRow.owner),
                                (document.getElementById(
                                    "view-detail-company-name"
                                ).innerHTML = currentRow.company_name),
                                (document.getElementById(
                                    "view-detail-category"
                                ).innerHTML = currentRow.category),
                                (document.getElementById(
                                    "view-detail-rating"
                                ).innerHTML = currentRow.rating),
                                (document.getElementById(
                                    "view-detail-email-id"
                                ).innerHTML = currentRow.email_id),
                                (document.getElementById(
                                    "view-detail-location"
                                ).innerHTML = currentRow.location),
                                (document.getElementById(
                                    "view-logo-image"
                                ).src = currentRow.logo_img),
                                (document.getElementById(
                                    "view-detail-about-company"
                                ).innerHTML = currentRow.about_company),
                                (action = "view"));
                        });
                });
            }),
            (removeButtons =
                document.getElementsByClassName("remove-item-btn")),
            Array.from(removeButtons).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (rowId = e.target.closest("tr").children[1].innerText),
                        t.remove("id", rowId),
                        (action = "delete");
                });
            }),
            (editButtons = document.getElementsByClassName("edit-item-btn")),
            Array.from(editButtons).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    e.target.closest("tr").children[1].innerText,
                        (rowId = e.target.closest("tr").children[1].innerText),
                        t.get({ id: rowId }).forEach(function (e) {
                            (currentRow = JSON.parse(JSON.stringify(e._values)))
                                .id == rowId &&
                                ((idField.value = currentRow.id),
                                (companyLogo.src = currentRow.logo_img),
                                (companyOwnerField.value = currentRow.owner),
                                (categoryField.value = currentRow.category),
                                (ratingField.value = currentRow.rating),
                                (companyNameField.value =
                                    currentRow.company_name),
                                (locationField.value = currentRow.location),
                                (emailField.value = currentRow.email_id),
                                (aboutCompanyField.value =
                                    currentRow.about_company),
                                (action = "edit"));
                        }),
                        contactModal.show();
                });
            }),
            (isFirst = 1 == t.i),
            (isLast = t.i > t.matchingItems.length - t.page),
            isFirst
                ? (nextButton.classList.remove("disabled"),
                  previousButton.classList.add("disabled"))
                : (isLast
                      ? nextButton.classList.add("disabled")
                      : nextButton.classList.remove("disabled"),
                  previousButton.classList.remove("disabled"));
        var e = t.i,
            n = parseInt(t.i) + parseInt(t.visibleItems.length) - 1;
        document.getElementById("pagination-status").innerHTML =
            "Showing " + e + " to " + n + " of " + t.items.length + " entries";
    }),
    document.body.contains(nextButton) &&
        nextButton.addEventListener("click", function () {
            parseInt(
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active a").innerHTML
            ) <
                contactList.items.length / contactList.page &&
                document.querySelector(".pagination.listjs-pagination") &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active")
                    .nextElementSibling.children[0].click();
        }),
    document.body.contains(previousButton) &&
        previousButton.addEventListener("click", function () {
            1 <
                parseInt(
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active a").innerHTML
                ) &&
                document.querySelector(".pagination.listjs-pagination") &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active")
                    .previousSibling.children[0].click();
        });
const clearFields = () => {
    (companyLogo.src =
        domainroot + "/assets/images/avatar/avatar-fallback.jpg"),
        (companyOwnerField.value = ""),
        (categoryField.value = ""),
        (ratingField.value = ""),
        (companyNameField.value = ""),
        (locationField.value = ""),
        (emailField.value = ""),
        (aboutCompanyField.value = ""),
        (action = null),
        contactList.sort("id", { order: "desc" }),
        contactList.update();
};
