const isbn = document.getElementById("isbn")
const btn = document.getElementById("btn_book_info")
const isbn_check = document.getElementById("isbn_check");
const bookImg = document.getElementById("thumbnail");
const img = document.getElementById("img");
const title = document.getElementById("title");
const price = document.getElementById("price");
const publisher = document.getElementById("publisher");
const contributor = document.getElementById("contributor");
const publishing_date = document.getElementById("publishing_date");
const product_form = document.getElementById("product_form");

btn.addEventListener("click", () => {
    if (btn.value == "true") {
        console.log("リセットするよ！");
        btn.value = false;
        btn.textContent = "書籍情報を取得";
        isbn_check.value = false;

        isbn_check.value = false;
        isbn.removeAttribute("disabled");
        // サムネイル
        const bookImgSrc = null;
        bookImg.setAttribute("src", bookImgSrc);
        //画像のソース
        img.value = "";
        img.removeAttribute("disabled");
        //書籍名
        title.value = null;
        title.removeAttribute("disabled");
        //価格
        price.value = null;
        price.removeAttribute("disabled");
        //出版社
        publisher.value = null;
        publisher.removeAttribute("disabled");
        //作者
        contributor.value = null;
        contributor.removeAttribute("disabled");
        //出版日
        publishing_date.value = null;
        publishing_date.removeAttribute("disabled");
        //版型

        product_form.value = null;
        product_form.removeAttribute("disabled");
        return;
    }


    // isbnに入力された値を取得
    const userInput = isbn.value;
    const query = userInput.split(" ").join("+");
    // APIを取得
    const url = "https://api.openbd.jp/v1/get?isbn=" + query + "&pretty";

    // json
    fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {

            if (data[0] == null) {
            } else {
                btn.value = true;
                btn.textContent = "リセット"
                
                isbn_check.value = true;
                isbn.setAttribute("disabled", true);
                // サムネイル
                const bookImgSrc = data[0].summary.cover;
                bookImg.setAttribute("src", bookImgSrc);
                //画像のソース
                img.value = bookImgSrc;
                img.setAttribute("disabled", true);
                //書籍名
                title.value = data[0].summary.title;
                title.setAttribute("disabled", true);
                //価格
                price.value =
                    data[0].onix.ProductSupply.SupplyDetail.Price[0].PriceAmount;
                price.setAttribute("disabled", true);
                //出版社
                publisher.value =
                    data[0].summary.publisher;
                publisher.setAttribute("disabled", true);
                //作者
                contributor.value =
                    data[0].summary.author;
                contributor.setAttribute("disabled", true);
                //出版日
                publishing_date.value =
                    data[0].summary.pubdate;
                publishing_date.setAttribute("disabled", true);
                //版型
                const product_form_origin = data[0].onix.DescriptiveDetail.ProductFormDetail
                //一覧を配列で渡してそこから検索の形にした方がきれいにまとまりそう
                let product_form_output
                switch (product_form_origin) {
                    case "B108": product_form_output = "A5";
                        break;
                    case "B109": product_form_output = "B5";
                        break;
                    case "B110": product_form_output = "B6";
                        break;
                    case "B111": product_form_output = "文庫";
                        break;
                    case "B112": product_form_output = "新書";
                        break;
                    case "B119": product_form_output = "46";
                        break;
                    case "B120": product_form_output = "46変形";
                        break;
                    case "B121": product_form_output = "A4";
                        break;
                    case "B122": product_form_output = "A4変形";
                        break;
                    case "B123": product_form_output = "A5変形";
                        break;
                    case "B124": product_form_output = "B5変形";
                        break;
                    case "B125": product_form_output = "B6変形";
                        break;
                    case "B126": product_form_output = "AB";
                        break;
                    case "B127": product_form_output = "B7";
                        break;
                    case "B128": product_form_output = "菊";
                        break;
                    case "B129": product_form_output = "菊変形";
                        break;
                    default: product_form_output = "不明"
                }
                product_form.value = product_form_output;
                product_form.setAttribute("disabled", true);
            }
        })

        .catch((err) => {
            console.log("Error!! " + err);
        });
});
