var isFirst,
    isLast,
    contactList = new List("contact-list", {
        valueNames: [
            "id",
            "name",
            "email_id",
            "phone",
            "company_name",
            "last_contact",
            { attr: "src", name: "avatar_img" },
            "designation",
            "lead_status",
            "personal_info",
        ],
        page: 8,
        pagination: !0,
    }),
    count = 0,
    domainroot = "https://dashui.codescandy.com/dashuipro";
const url = new Request(domainroot + "/assets/json/contact-list.json");
fetch(url)
    .then((e) => e.json())
    .then((e) => {
        for (var t = JSON.parse(JSON.stringify(e)), n = 0; n < t.length; ++n)
            contactList.add({
                id: t[n].id,
                name: t[n].name,
                email_id: t[n].email_id,
                phone: t[n].phone,
                company_name: t[n].company_name,
                last_contact: t[n].last_contact,
                avatar_img: t[n].avatar_img,
                designation: t[n].designation,
                lead_status: t[n].lead_status,
                personal_info: t[n].personal_info,
            });
    })
    .catch(console.error);
var idField = document.getElementById("id-field"),
    contactImage = document.getElementById("contact-image"),
    contactNameField = document.getElementById("contact-name-field"),
    emailField = document.getElementById("email-field"),
    phoneNumberField = document.getElementById("phone-number-field"),
    companyNameField = document.getElementById("company-name-field"),
    designationField = document.getElementById("designation-field"),
    personalInfoField = document.getElementById("personal-information-field"),
    leadStatusField = document.getElementById("lead-status-field"),
    contactModal = new bootstrap.Modal(
        document.getElementById("contact-modal"),
        { keyboard: !1 }
    ),
    contactModalButton = document.getElementById("contact-modal-button"),
    addButton = document.getElementById("add-btn"),
    updateButton = document.getElementById("update-btn"),
    nextButton = document.querySelector(".pagination-next"),
    previousButton = document.querySelector(".pagination-prev"),
    paginationStatus = document.getElementById("pagination-status"),
    action = null;
contactModalButton.addEventListener("click", function () {
    clearFields();
}),
    document
        .getElementById("contact-modal")
        .addEventListener("show.bs.modal", function (e) {
            (count = contactList.items.length + 1),
                "edit" === action
                    ? ((document.getElementById(
                          "contact-modal-label"
                      ).innerHTML = "Edit Contact"),
                      (updateButton.style.display = "block"),
                      (addButton.style.display = "none"))
                    : ((document.getElementById(
                          "contact-modal-label"
                      ).innerHTML = "Add New Contact"),
                      (idField.value = count),
                      (updateButton.style.display = "none"),
                      (addButton.style.display = "block")),
                (action = null);
        }),
    document
        .getElementById("contact-modal")
        .addEventListener("hidden.bs.modal", function (e) {
            e.preventDefault(), clearFields();
        }),
    document.body.contains(addButton) &&
        addButton.addEventListener("click", function (e) {
            var t = moment(new Date()).format("MMM DD, YYYY HH:mm A");
            "" !== contactNameField.value &&
                "" !== emailField.value &&
                "" !== phoneNumberField.value &&
                "" !== companyNameField.value &&
                "" !== designationField.value &&
                "" !== leadStatusField.value &&
                (contactList.add({
                    id: count,
                    avatar_img: contactImage.src,
                    name: contactNameField.value,
                    email_id: emailField.value,
                    phone: phoneNumberField.value,
                    company_name: companyNameField.value,
                    designation: designationField.value,
                    last_contact: t,
                    lead_status: leadStatusField.value,
                    personal_info: personalInfoField.value,
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
                        avatar_img: contactImage.src,
                        name: contactNameField.value,
                        email_id: emailField.value,
                        phone: phoneNumberField.value,
                        company_name: companyNameField.value,
                        designation: designationField.value,
                        lead_status: leadStatusField.value,
                        personal_info: personalInfoField.value,
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
                                ((document.getElementById(
                                    "view-detail-name"
                                ).innerHTML = currentRow.name),
                                (document.getElementById(
                                    "view-detail-current-job"
                                ).innerHTML =
                                    currentRow.designation +
                                    " at " +
                                    currentRow.company_name),
                                (document.getElementById(
                                    "view-detail-email-id"
                                ).innerHTML = currentRow.email_id),
                                (document.getElementById(
                                    "view-detail-phone"
                                ).innerHTML = currentRow.phone),
                                (document.getElementById(
                                    "view-detail-last-contact"
                                ).innerHTML = currentRow.last_contact),
                                (document.getElementById(
                                    "view-detail-lead-status"
                                ).innerHTML = currentRow.lead_status),
                                (document.getElementById(
                                    "view-detail-designation"
                                ).innerHTML = currentRow.designation),
                                (document.getElementById(
                                    "view-detail-image"
                                ).src = currentRow.avatar_img),
                                (document.getElementById(
                                    "view-detail-personal-info"
                                ).innerHTML = currentRow.personal_info),
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
                                (contactImage.src = currentRow.avatar_img),
                                (contactNameField.value = currentRow.name),
                                (emailField.value = currentRow.email_id),
                                (phoneNumberField.value = currentRow.phone),
                                (companyNameField.value =
                                    currentRow.company_name),
                                (designationField.value =
                                    currentRow.designation),
                                (leadStatusField.value =
                                    currentRow.lead_status),
                                (personalInfoField.value =
                                    currentRow.personal_info),
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
        paginationStatus.innerHTML =
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
    (contactImage.src =
        domainroot + "/assets/images/avatar/avatar-fallback.jpg"),
        (contactNameField.value = ""),
        (emailField.value = ""),
        (phoneNumberField.value = ""),
        (companyNameField.value = ""),
        (designationField.value = ""),
        (leadStatusField.value = ""),
        (personalInfoField.value = ""),
        (action = null),
        contactList.sort("id", { order: "desc" }),
        contactList.update();
};
