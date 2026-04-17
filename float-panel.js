function McFloatPanel() {
    function t() {
        i || (i = setInterval(function() {
            var t = h.body;
            t[m] < 3 ? t[m] = 0 : t[m] = t[m] / 1.3, w[m] < 3 ? w[m] = 0 : w[m] = w[m] / 1.3, I() || (clearInterval(i), i = null)
        }, 14))
    }

    function n() {
        clearTimeout(o), I() > N && W() > O ? (o = setTimeout(function() {
            x(e, "mcOut")
        }, 60), e[d][u] = "block") : (E(e, "mcOut"), o = setTimeout(function() {
            e[d][u] = "none"
        }, 500))
    }
    var e, i, o, a = [],
        r = [],
        l = "className",
        c = "getElementsByClassName",
        s = "length",
        u = "display",
        f = "transition",
        d = "style",
        p = "height",
        m = "scrollTop",
        v = "offsetHeight",
        g = "fixed",
        h = document,
        w = document.documentElement,
        T = function(t, n, e) {
            t.addEventListener ? t.addEventListener(n, e, !1) : t.attachEvent && t.attachEvent("on" + n, e)
        },
        H = function(t, n) {
            if ("undefined" != typeof getComputedStyle) var e = getComputedStyle(t, null);
            else e = t.currentStyle;
            return e ? e[n] : g
        },
        y = function() {
            var t = h.body;
            return Math.max(t.scrollHeight, t[v], w.clientHeight, w.scrollHeight, w[v])
        },
        S = function(t, n) {
            for (var e = t[s]; e--;)
                if (t[e] === n) return !0;
            return !1
        },
        b = function(t, n) {
            return S(t[l].split(" "), n)
        },
        E = function(t, n) {
            b(t, n) || (t[l] ? t[l] += " " + n : t[l] = n)
        },
        x = function(t, n) {
            if (t[l] && b(t, n)) {
                for (var e = "", i = t[l].split(" "), o = 0, a = i[s]; a > o; o++) i[o] !== n && (e += i[o] + " ");
                t[l] = e.replace(/^\s+|\s+$/g, "")
            }
        },
        I = function() {
            return window.pageYOffset || w[m]
        },
        P = function(t) {
            return t.getBoundingClientRect().top
        },
        B = function(t) {
            var n = I();
            n > t.oS && !b(t, g) ? E(t, g) : b(t, g) && n < t.oS && x(t, g)
        },
        D = function() {
            for (var t = 0; t < r[s]; t++) L(r[t])
        },
        L = function(t) {
            t.oS ? (t.fT && clearTimeout(t.fT), t.fT = setTimeout(function() {
                t.aF ? B(t) : C(t)
            }, 50)) : C(t)
        },
        k = function(t, n, e) {
            x(t, g), n[u] = "none", e.position = e.top = ""
        },
        C = function(t) {
            var n = P(t),
                e = t[v],
                i = t[d],
                o = t.pH[d],
                a = I();
            if (n < t.oT && a > t.oS && !b(t, g) && (window.innerHeight || w.clientHeight) > e) {
                t.tP = a + n - t.oT;
                var r = y();
                if (e > r - t.tP - e) var l = e;
                else l = 0;
                o[u] = "block", o[f] = "none", o[p] = e + 1 + "px", t.pH[v], o[f] = "height .3s", o[p] = l + "px", E(t, g), i.position = g, i.top = t.oT + "px", H(t, "position") != g && (o[u] = "none")
            } else if (b(t, g) && (a < t.tP || a < t.oS)) {
                var c = H(t, "animation");
                if (t.oS && t.classList && -1 != c.indexOf("slide-down")) {
                    var s = H(t, "animationDuration");
                    t.classList.remove(g), i.animationDirection = "reverse", i.animationDuration = "300ms", void t[v], t.classList.add(g), setTimeout(function() {
                        k(t, o, i), i.animationDirection = "normal", i.animationDuration = s
                    }, 300)
                } else k(t, o, i)
            }
        },
        F = function() {
            var t, n, e = [];
            if (h[c]) e = h[c]("float-panel"), a = h[c]("slideanim");
            else {
                var i = h.getElementsByTagName("*");
                for (t = i[s]; t--;) b(i[t], "float-panel") && e.push(i[t])
            }
            t = e[s];
            for (var o = 0; t > o; o++) n = r[o] = e[o], n.oT = parseInt(n.getAttribute("data-top") || 0), n.oS = parseInt(n.getAttribute("data-scroll") || 0), n.oS > 20 && H(n, "position") == g && (n.aF = 1), n.pH = h.createElement("div"), n.pH[d].width = n.offsetWidth + "px", n.pH[d][u] = "none", n.parentNode.insertBefore(n.pH, n.nextSibling);
            r[s] && (setTimeout(D, 160), T(window, "scroll", D))
        },
        N = 200,
        O = 0,
        W = function() {
            return window.innerWidth || w.clientWidth || h.body.clientWidth
        },
        A = function() {
            if (e = h.getElementById("backtop")) {
                var i = e.getAttribute("data-v-w");
                i && (i = i.replace(/\s/g, "").split(","), N = parseInt(i[0]), i[s] > 1 && (O = parseInt(i[1]))), T(e, "click", t), T(window, "scroll", n), n()
            }
        },
        M = function() {
            for (var t, n, e = I(), i = e + window.innerHeight, o = a[s], r = 0; o > r; r++) t = e + P(a[r]), n = t + a[r][v], i > t ? E(a[r], "slide") : x(a[r], "slide")
        },
        R = function() {
            a[s] && (T(window, "scroll", M), M())
        },
        Y = function() {
            F(), A(), R()
        };
    T(window, "load", Y), T(document, "touchstart", function() {})
}
var floatPanel = new McFloatPanel;