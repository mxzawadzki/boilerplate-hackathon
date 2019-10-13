export default () => {
  if ('geolocation' in navigator) {
    navigator.geolocation.getCurrentPosition((position) => [position.coords.latitude, position.coords.longitude])
  } else {
    /* geolocation IS NOT available */
    return false
  }
}
