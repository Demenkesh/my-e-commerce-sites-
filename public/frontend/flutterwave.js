
// $(function() {
//     $("#makePaymentForm").submit(function(e) {
//         e.preventDefault();
//         var name = $("#name").val();
//         var email = $("#email").val();
//         var phone = $("#number").val();
//         var amount = $("#amount").val();
//         //make our payment
//         makePayment(amount, email, phone, name);
//     });
// });

// function makePayment(amount, email, phone_number, name) {
//     FlutterwaveCheckout({
//         public_key: "FLWPUBK_TEST-78fa1a603a6be122aa8a26e2cee1c3d4-X",
//         tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
//         amount,
//         currency: "USD",
//         country: "US",
//         payment_options: " ",
//         customer: {
//             email,
//             phone_number,
//             name,
//         },
//         callback: function(data) {
//             var transaction_id = data.transaction_id;
//             // Make ajax request
//             var _token = $("input[name='_token']").val();
//             //         'payment_mode': "paid with flutterwave",
//             //         'payment_id': transaction_id,
//             //         'tx_ref': _token,
//             //         transaction_id,
//             //         _token
//             //     },
//             // var firstname = $('.firstname').val();
//             // var lastname = $('.lastname').val();
//             // var email = $('.email').val();
//             // var phone = $('.number').val();
//             // var address1 = $('.address1').val();
//             // var city = $('.city').val();
//             // var state = $('.state').val();
//             // var zipcode = $('.zipcode').val();
//             // var country = $('.country').val();

//             $.ajax({
//                 method: "POST",
//                 url: "/place-order",
//                 data: {
//                     // 'firstname': firstname,
//                     // 'lastname': lastname,
//                     // 'email': email,
//                     // 'phone': number,
//                     // 'address': address1,
//                     // 'city': city,
//                     // 'state': state,
//                     // 'zipcode': zipcode,
//                     // 'country': country,
//                     'payment_mode': "paid with flutterwave",
//                     'payment_id': transaction_id,
//                     // 'tx_ref': _token,
//                 },
//                 success: function(response) {
//                     alert(response.status);
//                     // window.location.href = "/my-orders";
//                     console.log(data);

//                 }

//             });
//         },
//         onclose: function() {
//             // close modal
//         },
//         customizations: {
//             title: "My store",
//             description: "Payment for items in cart",
//             logo: "https://s3-us-west-2.amazonaws.com/hp-cdn-01/uploads/orgs/flutterwave_logo.jpg?69",
//         },
//     });
// }

