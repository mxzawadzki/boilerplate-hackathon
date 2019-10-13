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
    .then(response => response.data)
    .catch(error => {
      console.error(error);
    });
};

/**
 * Verify decoded QR
 * @param {*} string
 */
export const verifyString = string => {
  const data = { string };
  return axios
    .post(`${API_URL}qry/zweryfikuj`, data)
    .then(response => response.data)
    .catch(error => {
      console.error(error);
    });
};

/**
 * Login
 */
export const login = ({ email, password }) => {
  const data = { email, password };
  return axios
    .post(`${API_URL}login`, data)
    .then(response => response.data)
    .then(data => {
      localStorage.setItem("authToken", data.token);
      return data;
    })
    .catch(error => {
      console.error(error);
    });
};

export const getUser = () => {
  const token = localStorage.getItem("authToken");
  return axios
    .get(`${API_URL}user?api_token=${token}`)
    .then(response => {
      if (response.status === 401) {
        localStorage.removeItem("authToken");
      }
      return response.data;
    })
    .catch(error => {
      console.error(error);
    });
};

export const isLoggedIn = () => {
  const token = localStorage.getItem("authToken");
  return !!token;
};

export const logout = () => {
  localStorage.removeItem("authToken");
};
