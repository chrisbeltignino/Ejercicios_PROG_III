"use strict";
class Ajax {
    constructor() {
        this.Get = (ruta, success, params = "", error) => {
            let parametros = params.length > 0 ? params : "";
            ruta = params.length > 0 ? ruta + "?" + parametros : ruta;
            this.xhr.open('GET', ruta);
            this.xhr.send();
            this.xhr.onreadystatechange = () => {
                if (this.xhr.readyState === Ajax.DONE) {
                    if (this.xhr.status === Ajax.OK) {
                        success(this.xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this.xhr.status);
                        }
                    }
                }
            };
        };
        this.Post = (ruta, success, params = "", error) => {
            let parametros = params.length > 0 ? params : "";
            this.xhr.open('POST', ruta, true);
            this.xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            this.xhr.send(parametros);
            this.xhr.onreadystatechange = () => {
                if (this.xhr.readyState === Ajax.DONE) {
                    if (this.xhr.status === Ajax.OK) {
                        success(this.xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this.xhr.status);
                        }
                    }
                }
            };
        };
        this.xhr = new XMLHttpRequest();
        Ajax.DONE = 4;
        Ajax.OK = 200;
    }
}
//# sourceMappingURL=ajax.js.map