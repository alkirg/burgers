let form = document.getElementById('order-form');
form.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('./src/form.php', {
        method: 'POST',
        body: new FormData(form)
    });

    let result = await response.json();

    console.log(result.message);
};