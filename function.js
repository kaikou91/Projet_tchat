setInterval(function() {

    //alert("Hello"); 
    //document.location.reload();
    // const champMsg = document.querySelector(".message");

    const url = `http://localhost/tchat/messages.php`;
    fetch(url)
        .then(response => response.json())
        .then((response) => {
            //dataJson = JSON.stringify(response);
            dataJson = JSON.parse(response);
            //console.log(dataJson);

            let messages = '';
            dataJson.forEach(
                element =>
                //console.log(element)
                messages += '<span>' + element.user + ' : ' + element.message + '</span></br>'
            );
            document.getElementById('messageArea').innerHTML = messages;

        })

}, 3000);

// const btnSubmit = document.querySelector("#btnEnvoyer");
// const champMsg = document.querySelector(".message");

// btnSubmit.addEventListener('click', (event) => {
//     event.preventDefault();
//     champMsg.innerHTML = '';
//     // console.log(serchMovie.value);
//     const url = `http://localhost/tchat/messages.php`;
//     fetch(url)
//         .then(response => response.json())
//         .then((response) => {
//             dataJson = JSON.parse(response);
//             if (dataJson) {
//                 dataJson.forEach(movie => {
//                     champMsg.insertAdjacentHTML('beforeend', `
//             <ul>
//                 <span>${movie.user}</span>
//                 <span>${movie.message}</span> 
//             </ul>
//             `);
//                 });
//             }
//         })
//         .catch((err) => {
//             console.log('mon erreur est:' + err);
//         })
// });