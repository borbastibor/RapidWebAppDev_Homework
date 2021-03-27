function test_for_special_chars(string) {
    let format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    return format.test(string);
}

function jError(text) {
    alert($("<span/>").html('&#10060; ' + text).text());
}

function convert_mysql_timestamp(timestamp) {
    let timestamp_array = timestamp.split('T');

    return timestamp_array[0] + ' ' + timestamp_array[1].split('.')[0];
}