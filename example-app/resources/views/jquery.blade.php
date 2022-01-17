<html>
<head>
    <script type="text/javascript">
        function ajax(select) {
            $.getJSON('/ajax/'+select.value, function(json){
                var secondSelect = document.querySelector('select[name=childId]');
                secondSelect.innerHTML = '';
                for(var i in json) {
                    secondSelect.innerHTML += '<option value="'+json[i].id+'">'+json[i].label+'</option>';
                }
            })
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
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
</body>
</html>