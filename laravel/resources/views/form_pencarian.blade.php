<div id="pencarian">
<form action="{{ url('biodata/cari') }}" method= "GET" id="form-pencarian">
    <div class="col-md-8">
        <div class="input-group">
            <input type="text" name="kata_kunci" placeholder="Kata Kunci" value="{{ old('kata_kunci') }}">
            <span class="input-group-btn">
            <input type="submit" value="search">
            </span>
        </div>
    </div>
</form>
</div>