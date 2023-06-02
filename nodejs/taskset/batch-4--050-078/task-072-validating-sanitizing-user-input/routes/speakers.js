const express = require("express");

const router = express.Router();

module.exports = (params) => {
  const { speakersService } = params;

  router.get("/", async (request, response) => {
    try {
      const speakers = await speakersService.getList();
      const artwork = await speakersService.getAllArtwork();
      response.render("layout", {
        pageTitle: "Speakers",
        template: "speakers",
        speakers,
        artwork,
      });
    } catch (err) {
      return next(err);
    }
  });

  router.get("/:shortname", async (request, response, next) => {
    try {
      const speaker = await speakersService.getSpeaker(
        request.params.shortname
      );
      const artwork = await speakersService.getArtworkForSpeaker(
        request.params.shortname
      );
      console.log(artwork);
      console.log(speaker);
      return response.render("layout", {
        pageTitle: "Speakers",
        template: "speakers-detail",
        speaker,
        artwork,
      });
    } catch (err) {
      return next(err);
    }
  });

  return router;
};
