const form = document.querySelector("#formEl");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    const formFields = document.querySelectorAll(".form-control");
    console.log(formFields[2].value)
    const name = formFields[0].value;
    const email = formFields[1].value;
    const message = formFields[2].value;
    function sendMail() {
        $.ajax({
          type: 'POST',
          url: 'https://mandrillapp.com/api/1.0/messages/send.json',
          data: {
            'key': '3e604d6948d1e530ae521566d103f0cb-us20',
            'message': {
              'from_email': email,
              'to': [
                  {
                    'email': email,
                    'name': name,
                    'type': 'to'
                  }
                ],
              'autotext': 'true',
              'subject': 'YOUR SUBJECT HERE!',
              'html': message
            }
          }
         }).done(function(response) {
           console.log(response); // if you're into that sorta thing
         });
    };
    sendMail()
    // form.submit();
})