const n = n => n < 10 ? ('0' + n) : n
export const time = function (value) {
  if (value) {
    let dt = new Date(value)
    return `${dt.getFullYear()}-${n(dt.getMonth() + 1)}-${n(dt.getDate())} ${n(dt.getHours())}:${n(dt.getSeconds())}`
  } else {
    return '--'
  }
}

export const size = function (value) {
  if (value === undefined || value === null || isNaN(value)) {
    return '--'
  }
  if (value < 1024) {
    return value + 'B'
  }
  value = value / 1024
  if (value < 1024) {
    return value.toFixed(1) + 'KB'
  }
  value = value / 1024
  return value.toFixed(1) + 'MB'
}
