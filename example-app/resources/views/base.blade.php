<html>
<head>
    <script type="text/javascript">
        function ajax(select) {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
              alert('Abandon :( Impossible de créer une instance de XMLHTTP');
              return false;
            }
            httpRequest.onreadystatechange = alertContents;
            httpRequest.open('GET', '/ajax/'+select.value);
            httpRequest.send();
        }

        function alertContents() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    try {
                        var json = JSON.parse(httpRequest.responseText);
                        var secondSelect = document.querySelector('select[name=childId]');
                        secondSelect.innerHTML = '';
                        for(var i in json) {
                            secondSelect.innerHTML += '<option value="'+json[i].id+'">'+json[i].label+'</option>';
                        }
                    } catch(exception) {
                        alert('Unable to decode JSON:'+exception);
                    }
                } else {
                    alert('Il y a eu un problème avec la requête.');
                }
            }
        }
    </script>
</head>
<body>
    <form method="POST" action="/result">
        @csrf
        <fieldset>
            <label for="boutiqueId">Boutique :</label>
            <select name="boutiqueId" onchange="ajax(this)">
                <option value="">-- S&eacute;lectionnez une boutique --</option>
            @foreach ($boutiques as $boutique)
                <option value="{{ $boutique->id }}">{{ $boutique->label }}</option>
            @endforeach
            </select>

            <br/>
            
            <label for="childId">Enfant :</label>
            <select name="childId"></select>

            <br/>

            <input type="submit"/>
        </fieldset>
    </form>
</body>
</html>