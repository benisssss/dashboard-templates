const apexLightTheme = {
  chart: {
    foreColor: "#212529", // bootstrap body text
    fontFamily: "'Poppins', sans-serif",
    toolbar: { show: false }
  },
  grid: {
    borderColor: "#dee2e6",
    strokeDashArray: 3
  },
  tooltip: {
    theme: "light"
  },
  xaxis: {
    labels: { style: { colors: "#212529" } },
    axisBorder: { show: true, color: "#dee2e6" },
    axisTicks: { show: true, color: "#dee2e6" }
  },
  yaxis: {
    labels: { style: { colors: "#212529" } }
  },
  legend: {
    labels: { colors: "#212529" }
  },
  title: {
    style: { color: "#212529", fontFamily: "'Poppins', sans-serif" }
  },
  subtitle: {
    style: { color: "#212529", fontFamily: "'Poppins', sans-serif" }
  }
};

const apexDarkTheme = {
  chart: {
    foreColor: "#f8f9fa",
    fontFamily: "'Poppins', sans-serif",
    toolbar: { show: false }
  },
  grid: {
    borderColor: "#495057",
    strokeDashArray: 3
  },
  tooltip: {
    theme: "dark"
  },
  xaxis: {
    labels: { style: { colors: "#f8f9fa" } },
    axisBorder: { show: true, color: "#495057" },
    axisTicks: { show: true, color: "#495057" }
  },
  yaxis: {
    labels: { style: { colors: "#f8f9fa" } }
  },
  legend: {
    labels: { colors: "#f8f9fa" }
  },
  title: {
    style: { color: "#f8f9fa", fontFamily: "'Poppins', sans-serif" }
  },
  subtitle: {
    style: { color: "#f8f9fa", fontFamily: "'Poppins', sans-serif" }
  }
};


function applyApexTheme() {
    const isDark = localStorage.getItem(`${SYSTEM_NAME}_theme_mode`) == "dark";
    const themeOptions = isDark ? apexDarkTheme : apexLightTheme;

    Apex.chart = Apex.chart || {};
    Apex.grid = Apex.grid || {};
    Apex.tooltip = Apex.tooltip || {};
    Apex.xaxis = Apex.xaxis || {};
    Apex.yaxis = Apex.yaxis || {};
    Apex.legend = Apex.legend || {};
    Apex.title = Apex.title || {};
    Apex.subtitle = Apex.subtitle || {};

    // Merge theme options
    Apex.chart = { ...Apex.chart, ...themeOptions.chart };
    Apex.grid = { ...Apex.grid, ...themeOptions.grid };
    Apex.tooltip = { ...Apex.tooltip, ...themeOptions.tooltip };
    Apex.xaxis = { ...Apex.xaxis, ...themeOptions.xaxis };
    Apex.yaxis = { ...Apex.yaxis, ...themeOptions.yaxis };
    Apex.legend = { ...Apex.legend, ...themeOptions.legend };
    Apex.title = { ...Apex.title, ...themeOptions.title };
    Apex.subtitle = { ...Apex.subtitle, ...themeOptions.subtitle };

    APEX_CHARTS.forEach((c) => {
        c.updateOptions(themeOptions, false, true);
    });
}