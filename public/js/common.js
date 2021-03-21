function test_for_special_chars(string) {
    let format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    return format.test(string);
}