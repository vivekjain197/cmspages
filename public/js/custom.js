$(document).ready(function() {
    $("#post_member").validate({
        rules: {
            relation: "required",
            fullname: "required",
            wife_father: "required",
            father_name: "required",
            mother_name: "required",
            nij_vans_id: "required",
            gender: "required",
            dob: "required",
            marital: "required",
            email: {
                email: true
            },

            full_address: "required",
            state_id: "required",
            district_id: "required",
            city_name: "required",
            zip_code: "required",

        },
        messages: {
            /*firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
            	required: "Please enter a username",
            	minlength: "Your username must consist of at least 2 characters"
            },
            password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long",
            	equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });


    $("#post_marragedata").validate({
        rules: {
            name: "required",
            gender: "required",
            smobile: "required",
            sdob: "required",
            sbday: "required",
            sbirthtime: "required",
            sbirthplace: "required",
            sselfvansh: "required",
            smamavansh: "required",
            trans_id: "required",


        },
        messages: {
            trans_id: "Please make payment and add Transaction and attached slip.",
            /* lastname: "Please enter your lastname",
             username: {
             	required: "Please enter a username",
             	minlength: "Your username must consist of at least 2 characters"
             },
             password: {
             	required: "Please provide a password",
             	minlength: "Your password must be at least 5 characters long"
             },
             confirm_password: {
             	required: "Please provide a password",
             	minlength: "Your password must be at least 5 characters long",
             	equalTo: "Please enter the same password as above"
             },
             email: "Please enter a valid email address",
             agree: "Please accept our policy"*/
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });


    $("#post_mahasabha").validate({
        rules: {
            mname: "required",
            mfname: "required",
            mhouse: "required",
            mgali: "required",
            mstate1: "required",
            mdistrict1: "required",
            mtahshil1: "required",
            mcity1: "required",
            mmobile: "required",


        },
        messages: {
            /*firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
            	required: "Please enter a username",
            	minlength: "Your username must consist of at least 2 characters"
            },
            password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long",
            	equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });

    $('.contact_phone').keyup(function(e) {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });


    $("#post_salahkar").validate({
        rules: {
            name: "required",
            time1: "required",
            time2: "required",
            contact: "required",
            email: "required",
            address: "required",
            cid: "required",
            terms: "required",

        },
        messages: {
            /*firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
            	required: "Please enter a username",
            	minlength: "Your username must consist of at least 2 characters"
            },
            password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
            	required: "Please provide a password",
            	minlength: "Your password must be at least 5 characters long",
            	equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });
});


function fnfilldist(obj) {
    var id = obj.value;
    $.ajax({
            method: "GET",
            url: "/getdist/" + id,
            data: { id: id }
        })
        .done(function(msg) {
            $('#district_id').html(msg);
            $('#tehshil').html('<option value="">-- Select Tehshil -</option>');
            //autofillsummery_info();
            //alert( "Data Saved: " + msg );
        });
}

function fnfilltehshil(obj) {
    var id = obj.value;
    $.ajax({
            method: "GET",
            url: "/gettehshil/" + id,
            data: { id: id }
        })
        .done(function(msg) {
            $('#tehshil').html(msg);
        });
}


function fngetstate(obj) {
    var id = obj.value;
    $.ajax({
            method: "GET",
            url: "/getstate/" + id,
            data: { id: id }
        })
        .done(function(msg) {
            $('#state_id').html(msg);
            autofillsummery_info();
            //alert( "Data Saved: " + msg );
        });
}