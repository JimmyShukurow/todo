<div class="main">
    <div class="searchingForm">
        <form id="searchForm">
            <label for="search"> Ara </label>
            <input type="text" placeholder="Aramak istedigin kelimeyi yaz" id="search" name="search" required>
            <p class="warningSearchForm">Uye olman gerek</p>
            <button type="submit"> Bul </button>
        </form>
    </div>
    <hr>
    <div class="addContent">
        <form  id="addContentToList" action="javascript:void(0)" method="post">
            <label for="nameOfContent">Ismini yaz</label>
            <input type="text" id="nameOfContent" name="nameOfContent" required>
            <label for="description">Tanimini yaz</label>
            <textarea  id="description" name="description" rows="4" cols="25" required></textarea>
            <p class="warningAddContentToList"> Uye olman gerek </p>
            <button type="submit" id="buttonOne">Ekle</button>
        </form>
    </div>
    

</div>