export default () => {
    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            return [position.coords.latitude, position.coords.longitude]
        })
    } else {
        /* geolocation IS NOT available */
        return false
    }
}
