<div class="container w-2/12 text-white">
    <select class=" p-3 rounded bg-indigo-400 uppercase" name="paginate" id="paginate">
        <option selected disabled>choose your number</option>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>
        <option value="10">10</option>
    </select>
</div>
<script>
    $(document).ready(function(){
        var url = new URL(window.location.href);
        $("#paginate").on('change', function() {
            paginate = this.value;
            url.searchParams.set('paginate', paginate);
            window.location.replace(url.href);
        });
    });
</script>
