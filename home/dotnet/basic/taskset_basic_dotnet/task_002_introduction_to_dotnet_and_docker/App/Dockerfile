# The ASP.NET Core runtime image is used intentionally here, although the mcr.microsoft.com/dotnet/runtime:8.0 image could have been used.
# The reason is that the runtime image is smaller and more suitable for production use, while the SDK image is more suitable for development.
FROM mcr.microsoft.com/dotnet/sdk:8.0 AS build-env
WORKDIR /App

# Copy everything
COPY . ./
# Restore as distinct layers
RUN dotnet restore
# Build and publish a release
RUN dotnet publish -c Release -o out

# Build runtime image
FROM mcr.microsoft.com/dotnet/aspnet:8.0
WORKDIR /App
COPY --from=build-env /App/out .
ENTRYPOINT ["dotnet", "DotNet.Docker.dll"]