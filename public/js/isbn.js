document.getElementById("getBookInfo").addEventListener("click", () => {
    // isbnに入力された値を取得
    var userInput = document.getElementById("isbn").value;
    var query = userInput.split(" ").join("+");
    // APIを取得
    const url = "https://api.openbd.jp/v1/get?isbn=" + query + "&pretty";

    // json
    fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            // サムネイル
            const bookImg = document.getElementById("thumbnail");
            const bookImgSrc = data[0].summary.cover;
            bookImg.setAttribute("src", bookImgSrc);
            //画像のソース
            document.getElementById("img").value = bookImgSrc;
            //書籍名
            document.getElementById("title").value = data[0].summary.title;
            //価格
            document.getElementById("price").value =
                data[0].onix.ProductSupply.SupplyDetail.Price[0].PriceAmount;
            //出版社
            document.getElementById("publisher").value =
                data[0].summary.publisher;
            //作者
            document.getElementById("contributor").value =
                data[0].summary.author;
            //出版日
            document.getElementById("publishing_date").value =
                data[0].summary.pubdate;
            //詳細
            document.getElementById("description").innerHTML =
                data[0].onix.CollateralDetail.TextContent[0].Text;

            // 情報エリアの表示
            document.getElementById("bookInfo").classList.add("show");
        })
        .catch((err) => {
            console.log("Error: " + err);
        });
});
