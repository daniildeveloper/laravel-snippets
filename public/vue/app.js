/**
 * Created by daniiltserin on 13.12.2016.
 */
var shop = null;

$.ajax({
    url: "/json/shop",
    method: "GET"
}).done(
    function (res) {
        shop = res;
        console.log(res);

        var Child = {
            template: '<span>{{item.description}}</span>'
        };

        Vue.component("list", {
            data: {
                items: res
            },
            template: '<ul><li v-for="item in items">{{item.description}}</li></ul>'
        });

        new Vue({
            el: "#app",
            data: {
                items: res
            },
            components: {
                "child": {
                    template: '<span>{{item.description}}</span>'
                }
            }
        });


    }
);


