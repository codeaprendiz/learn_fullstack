const express = require("express");

const speakersRoute = require("./speakers");
const feedbackRoute = require("./feedback");

const router = express.Router();

module.exports = (params) => {
  const { speakersService } = params;

  router.get("/", async (request, response, next) => {
    // To see error page
    // return next(new Error("Some error"));
    try {
      if (!request.session.visitcount) {
        request.session.visitcount = 0;
      }
      request.session.visitcount += 1;
      console.log("Visit Count : ", request.session.visitcount);

      const topSpeakers = await speakersService.getList();
      const artwork = await speakersService.getAllArtwork();

      console.log(topSpeakers);
      return response.render("layout", {
        pageTitle: "Welcome",
        template: "index",
        topSpeakers,
        artwork,
      });
    } catch (err) {
      return next(err);
    }
  });

  router.use("/speakers", speakersRoute(params));
  router.use("/feedback", feedbackRoute(params));

  return router;
};
