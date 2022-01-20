let form = document.getElementById('order-form');
form.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('../src/form.php', {
        method: 'POST',
        body: new FormData(form)
    });

    let result = await response.json();

    if (result.success)
        form.innerHTML = result.message;
    else
        form.innerHTML += '<span style="color:red;">' + result.message + '</span>';
};