// Pengaturan Form Untuk Management Record

var loading = document.getElementsByClassName("loading");
var currentTab = 0; // Current tab is set to be the first tab (0)
// showTab(currentTab); // Display the current tab

// function showTab(n) {
//     // This function will display the specified tab of the form...
//     var x = document.getElementsByClassName("tab");
//     x[n].style.display = "block";
//     //... and fix the Previous/Next buttons:
//     if (n == 0) {
//         document.getElementById("prevBtn").style.display = "none";
//     } else {
//         document.getElementById("prevBtn").style.display = "inline";
//     }
//     if (n == x.length - 1) {
//         document.getElementById("nextBtn").innerHTML = "Submit";
//     } else {
//         document.getElementById("nextBtn").innerHTML = "Next";
//     }
//     //... and run a function that will display the correct step indicator:
//     fixStepIndicator(n);
// }

// function nextPrev(n) {
//     // This function will figure out which tab to display
//     var x = document.getElementsByClassName("tab");
//     // Exit the function if any field in the current tab is invalid:
//     if (n == 1 && !validateForm()) return false;
//     // Hide the current tab:
//     x[currentTab].style.display = "none";
//     // Increase or decrease the current tab by 1:
//     currentTab = currentTab + n;
//     // if you have reached the end of the form...
//     if (currentTab >= x.length) {
//         // ... the form gets submitted:
//         document.getElementById("sectionForm").submit();

//         // on loading

//         return false;
//     }
//     // Otherwise, display the correct tab:
//     showTab(currentTab);
// }

// function validateForm() {
//     // This function deals with validation of the form fields
//     var x,
//         y,
//         z,
//         i,
//         valid = true;
//     x = document.getElementsByClassName("tab");
//     y = x[currentTab].getElementsByTagName("input");
//     z = x[currentTab].getElementsByTagName("select");
//     // A loop that checks every input field in the current tab:
//     for (i = 0; i < y.length; i++) {
//         // If a field is empty...
//         if (y[i].value == "") {
//             // add an "invalid" class to the field:
//             y[i].className += " invalid";
//             // and set the current valid status to false
//             valid = false;
//         }
//     }

//     for (i = 0; i < z.length; i++) {
//         // If a field is empty...
//         if (z.length > 0 && z[i] != undefined) {
//             // If a field from select is empty...
//             console.log(z[i].options[z[i].selectedIndex].value);
//             if (z[i].options[z[i].selectedIndex].text == "Pilihan") {
//                 // add an "invalid" class to the field:
//                 z[i].className += " invalid";
//                 // and set the current valid status to false
//                 valid = false;
//             }
//         }
//     }
//     // If the valid status is true, mark the step as finished and valid:
//     if (valid) {
//         document.getElementsByClassName("step")[currentTab].className +=
//             " finish";
//     }
//     return valid; // return the valid status
// }

// function fixStepIndicator(n) {
//     // This function removes the "active" class of all steps...
//     var i,
//         x = document.getElementsByClassName("step");
//     for (i = 0; i < x.length; i++) {
//         x[i].className = x[i].className.replace(" active", "");
//     }
//     //... and adds the "active" class on the current step:
//     x[n].className += " active";
// }

// Pengaturan Visualisasi frame-gigi
var arrayOfObject = [];

var gigi = $("#gigi").val();

if (gigi.length > 0) {
    // replace all ' with "
    gigi = gigi.replace(/'/g, '"');
    // convert string to array
    gigi = JSON.parse(gigi);
}

var groupInputTembelan = $(".tembelan-detail");

var angka = [];

if (gigi.length > 0) {
    for (var i = 0; i < gigi.length; i++) {
        arrayOfObject.push(gigi[i]);
        angka.push(gigi[i][1]);
        if (gigi[i][0] == "tembelan") {
            groupInputTembelan.append(
                '<p id="tembelan-' +
                    gigi[i][1] +
                    '" class="col-md-3">Tembelan no ' +
                    gigi[i][1] +
                    ' <input class="banyak-tembelan mb-2" type="number" id="tem-input-' +
                    gigi[i][1] +
                    '" name="tembelan_detail[]" value="' +
                    gigi[i][2] +
                    '"></p>'
            );
        }
    }
}

var indicator = 0;
$(document).ready(function () {
    $(".kotak").click(function () {
        var tembelan_detail = $(".tembelan-detail");

        // console.log(tembelan_detail);

        var nomor = $(this).attr("data-nomor");
        var nomor_gigi = $("#nomor_gigi").val();
        var gigi = $("#gigi").val();
        var isExist = false;

        // check apakah nomor sudah pernah di ambil
        isExist = angka.includes(nomor);
        // console.log(angka.includes(nomor));

        if (isExist != true) {
            arrayOfObject.push(["tembelan", nomor, "1"]);
            $(this).addClass("tembelan");
            angka.push(nomor);
            console.log(arrayOfObject);

            // add input in .tembelan-detail for each nomor
            tembelan_detail.append(
                '<p id="tembelan-' +
                    nomor +
                    '" class="col-md-3">Tembelan no ' +
                    nomor +
                    ' <input class="banyak-tembelan mb-2" type="number" id="tem-input-' +
                    nomor +
                    '" name="tembelan_detail[]" value="1"></p>'
            );

            var nomor_gigi = angka;
            $("#nomor_gigi").val(nomor_gigi);

            var gigi = arrayOfObject;
            $("#gigi").val(JSON.stringify(gigi));
        } else {
            // remove array that have same value with nomor
            arrayOfObject = arrayOfObject.filter(function (item) {
                return item[1] !== nomor;
            });

            // remove angka that have same value with nomor
            angka = angka.filter(function (item) {
                return item !== nomor;
            });

            indicator++;
            if ($(this).hasClass("tembelan")) {
                // remove other class and add class sisa-akar
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");
                // <div class="col-md-3 gigi-palsu">Gigi Palsu</div>
                // <div class="col-md-3 implan">Implan</div>
                // <div class="col-md-3 gr">GR</div>
                // <div class="col-md-3 mobility">Mobility</div>
                // <div class="col-md-3 persistensi">Persistensi</div>
                // <div class="col-md-3 impaksi">Impaksi</div>

                $(this).addClass("sisa-akar");
                arrayOfObject.push(["sisa-akar", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);

                // remove input in #tembelan-detail for each nomor
                $("#tembelan-" + nomor).remove();
            } else if ($(this).hasClass("sisa-akar")) {
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("lubang");
                arrayOfObject.push(["lubang", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("lubang")) {
                $(this).removeClass("lubang");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("hilang");
                arrayOfObject.push(["hilang", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("hilang")) {
                $(this).removeClass("hilang");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("gigi-palsu");
                arrayOfObject.push(["gigi-palsu", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("gigi-palsu")) {
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("implan");
                arrayOfObject.push(["implan", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("implan")) {
                $(this).removeClass("implan");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("gr");
                arrayOfObject.push(["gr", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("gr")) {
                $(this).removeClass("gr");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("mobility");
                arrayOfObject.push(["mobility", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("mobility")) {
                $(this).removeClass("mobility");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");

                $(this).addClass("persistensi");
                arrayOfObject.push(["persistensi", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else if ($(this).hasClass("persistensi")) {
                $(this).removeClass("persistensi");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("lubang");
                $(this).removeClass("hilang");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");

                $(this).addClass("impaksi");
                arrayOfObject.push(["impaksi", nomor, "1"]);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                angka.push(nomor);
            } else {
                $(this).removeClass("hilang");
                $(this).removeClass("lubang");
                $(this).removeClass("sisa-akar");
                $(this).removeClass("tembelan");
                $(this).removeClass("gigi-palsu");
                $(this).removeClass("implan");
                $(this).removeClass("gr");
                $(this).removeClass("mobility");
                $(this).removeClass("persistensi");
                $(this).removeClass("impaksi");
                // remove string that have same value with nomor
                var nomor_gigi = angka;
                $("#nomor_gigi").val(nomor_gigi);
                var gigi = arrayOfObject;
                $("#gigi").val(JSON.stringify(gigi));
                indicator = 0;
            }
        }
    });
});

// add event listener to .banyak-tembelan
$(document).on("change", ".banyak-tembelan", function () {
    var nomor = $(this).attr("id").split("-")[2];
    var banyak = $(this).val();
    var gigi = arrayOfObject;

    // update arrayOfObject
    for (var i = 0; i < gigi.length; i++) {
        if (gigi[i][1] == nomor) {
            gigi[i][2] = banyak;
        }
    }

    // update gigi
    $("#gigi").val(JSON.stringify(gigi));
});

var arrayNomor = [];
$(".kotak").each(function () {
    var nomor = $(this).attr("data-nomor");
    var inputNomor = $("#nomor_gigi").val();

    for (var i = 0; i < gigi.length; i++) {
        if (gigi[i][1] == nomor) {
            $(this).addClass(gigi[i][0]);
            arrayNomor.push(nomor);
        }
    }

    $("#nomor_gigi").val(arrayNomor);
});
