window.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('.meme-img')
    const textInput = document.querySelector('#meme-text')
    const save = document.querySelector('#save')

    const createCanvas = () => {
        const canvas = document.querySelector('#canvas')
        const context = canvas.getContext('2d')
        context.fillStyle = "blue";
        context.font = "bold 24px Arial";
        const position = {
            x : canvas.width / 2,
            y : canvas.height / 2
        }

        return {
            draw : img => context.drawImage(img, 0, 0),
            write : text => context.fillText(text, position.x, position.y),
            save : () => canvas.toDataURL()
        }
    }
    

    const requestHandler = () => {
        const xhr = new XMLHttpRequest();
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        const handler = {
            submit : data => {
                data['_token'] = token
                console.log(data)

                // console.log(let _token   = $('meta[name="csrf-token"]').attr('content');)
                xhr.open("POST","/");
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                // xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
                xhr.send(JSON.stringify(data));
            },

            response : () => {
                console.log(xhr.responseText)
                const response = JSON.parse(xhr.responseText);
                if (response.status === 201) {
                    window.location.href = '/success?meme=' + response.data.image;
                }
            }
        }

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                handler.response();
            }
        }


        return handler;

    }

    const canvas = createCanvas()

    const reqHandler = requestHandler()

    images.forEach(image => {
        image.addEventListener('click', () => canvas.draw(image))
    })

    textInput.addEventListener('input', () => canvas.write(textInput.value))

    save.addEventListener('click', () => {
        reqHandler.submit({
            title: textInput.value,
            image : canvas.save(),
        })
    })
});