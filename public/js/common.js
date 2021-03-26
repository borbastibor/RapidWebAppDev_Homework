function test_for_special_chars(string) {
    let format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    return format.test(string);
}

function jError(text) {
    alert($("<span/>").html('&#10060; ' + text).text());
}