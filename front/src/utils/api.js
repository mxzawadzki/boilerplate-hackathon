import axios from "axios";

const API_URL = "http://ec2-34-249-95-148.eu-west-1.compute.amazonaws.com/api/";

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
  const preparedBounds = {
    boundaries: [
      [_southWest.lat, _southWest.lng],
      [_northEast.lat, _northEast.lng]
    ]
  };
  return axios
    .post(`${API_URL}miejsca/w-obszarze`, preparedBounds)
    .then(response => response.data);
};

/** */
