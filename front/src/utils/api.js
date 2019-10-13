import axios from "axios";

const API_URL = "https://api.adambuczek.com/api/";

/**
 * @example for param bounds
 * {
 *    "_southWest": {
 *      "lat": -19.642587534013032,
 *      "lng": -47.63671875000001
 *  },
 *  "_northEast": {
 *      "lat": 80.14868414142826,
 *      "lng": 92.81250000000001
 *  }
 * }
 *
 *
 */
export const getPointsForBounds = bounds => {
  /**
   * Prepare map bounds for api consumption
   */
  const { _southWest, _northEast } = bounds;
  const data = {
    boundaries: [
      [_southWest.lat, _southWest.lng],
      [_northEast.lat, _northEast.lng]
    ]
  };
  return axios
    .post(`${API_URL}miejsca/w-obszarze`, data)
    .then(response => response.data);
};

/**
 * Verify decoded QR
 * @param {*} string
 */
export const verifyString = string => {
  const data = { string };
  return axios
    .post(`${API_URL}qry/zweryfikuj`, data)
    .then(response => response.data);
};

/** */
