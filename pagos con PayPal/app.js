// app.js
paypal.Buttons({
    createOrder: function(data, actions) {
        // Crear el pedido en PayPal con importe de 1 euro
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '1.00'  // El precio que vas a cobrar en euros
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        // Cuando el pago es aprobado
        return actions.order.capture().then(function(details) {
            alert('Pago realizado con éxito por ' + details.payer.name.given_name);
            console.log(details);  // Aquí puedes ver los detalles de la transacción
        });
    },
    onError: function(err) {
        alert('Hubo un error en el proceso de pago.');
        console.error(err);
    }
}).render('#paypal-button-container');  // Renderiza el botón en el contenedor
