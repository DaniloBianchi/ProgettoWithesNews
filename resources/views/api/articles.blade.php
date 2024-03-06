<x-layout title="Homepage -">
<x-navbar/>

<ul id="articles"></ul>
<script>
         const articles = document.getElementById('articles');
    fetch('http://127.0.0.1:8000/api/articoli')
    .then(response => response.json())
    .then(data => {

                for(let item of data) {

                    articles.innerHTML += '<li>' + item + '</li>';

                }
            })
    .cach()
</script>
</x-layout>